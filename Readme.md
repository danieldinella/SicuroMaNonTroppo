# Progetto SQL Injection Dimostrativo

Questo progetto crea un sito web vulnerabile a SQL Injection utilizzando Docker. Il server utilizza PHP 7.4 e MySQL 5.7. L'obiettivo è educativo e serve a dimostrare come una vulnerabilità di SQL Injection possa essere sfruttata.

## Requisiti

- **Docker**: Devi avere Docker installato sul tuo sistema.
- **Diritti di Esecuzione**: Assicurati di avere i diritti necessari per eseguire gli script nella cartella del progetto.

## Configurazione e Avvio

1. **Avvia il Progetto**:

Per avviare il sito web vulnerabile e i relativi servizi, entra nella directory del progetto da terminale ed esegui il comando:

   sudo ./setup.sh

Questo comando costruirà le immagini Docker necessarie e avvierà i contenitori.

2. **Accedi al Sito Web**:

Dopo aver avviato il progetto, apri un browser e visita http://localhost:8080. Qui troverai il sito web vulnerabile a SQL Injection.

3. **Pulizia**:
Per rimuovere i contenitori, le immagini e i volumi Docker creati durante il progetto, entra nella directory del progetto da terminale ed esegugi il comando:

    sudo ./clean.sh

Nota: Questo script rimuove tutte le risorse create dal progetto. Assicurati di non avere dati importanti non salvati.

4. **Sicurezza**:
Questo progetto è intenzionalmente vulnerabile a SQL Injection e non deve essere utilizzato in ambienti di produzione o con dati reali. È destinato esclusivamente a scopi educativi e di test.
