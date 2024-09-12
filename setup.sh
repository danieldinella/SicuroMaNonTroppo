#!/bin/bash

# Assicurati che lo script venga eseguito dalla radice del progetto
cd "$(dirname "$0")"

# Verifica se Docker è installato
if ! command -v docker &> /dev/null; then
    echo "Docker non è installato. Installalo prima di eseguire questo script."
    exit 1
fi

# Verifica se Docker Compose è installato
if ! command -v docker-compose &> /dev/null; then
    echo "Docker Compose non è installato. Installalo prima di eseguire questo script."
    exit 1
fi

# Verifica lo stato del demone Docker
if ! systemctl is-active --quiet docker; then
    echo "Il demone Docker non è attivo. Tentando di avviarlo..."
    sudo systemctl start docker
    if ! systemctl is-active --quiet docker; then
        echo "Impossibile avviare il demone Docker. Controlla i log per ulteriori dettagli."
        exit 1
    fi
fi

# Verifica i permessi del socket Docker
if [ ! -S /var/run/docker.sock ]; then
    echo "Il socket Docker non esiste. Assicurati che Docker sia installato e in esecuzione."
    exit 1
fi

if [ ! -r /var/run/docker.sock ] || [ ! -w /var/run/docker.sock ]; then
    echo "Il socket Docker non ha i permessi corretti. Assicurati di avere i permessi necessari."
    exit 1
fi

# Costruisci le immagini Docker
echo "Costruzione delle immagini Docker..."
docker-compose build || { echo "Errore durante la costruzione delle immagini Docker."; exit 1; }

# Avvia i servizi Docker
echo "Avviando i servizi Docker..."
sudo docker-compose up -d || { echo "Errore durante l'avviamento dei servizi Docker."; exit 1; }

# Attendere l'inizializzazione del database
echo "Attendere che il database MySQL venga inizializzato..."
sleep 20  # Attendere 20 secondi per dare il tempo al database di avviarsi

# Verifica se il database MySQL è pronto
if sudo docker-compose exec -T db mysql -uroot -pSQL1nject2024 -e "SHOW DATABASES;" > /dev/null 2>&1; then
    echo "Database MySQL pronto."
else
    echo "Errore: Il database MySQL non è accessibile. Assicurati che il database sia correttamente inizializzato e funzionante."
    exit 1
fi

echo "Setup completato. I servizi sono in esecuzione. Visita http://localhost:8080 per il sito web."
