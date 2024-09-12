#!/bin/bash

# Assicurati che lo script venga eseguito dalla radice del progetto
cd "$(dirname "$0")"

# Ferma e rimuove i container del progetto
echo "Stopping and removing project containers..."
sudo docker-compose down

# Rimuovi i volumi associati al progetto
echo "Removing project volumes..."
docker_volumes=$(sudo docker volume ls --format "{{.Name}}" | grep -E '^sicuromanontroppo')
if [ -n "$docker_volumes" ]; then
    echo "$docker_volumes" | xargs sudo docker volume rm
else
    echo "No project-specific volumes found."
fi

# Rimuovi le immagini Docker create durante il setup
echo "Removing project Docker images..."
sudo docker-compose down --rmi all

# Pulizia completata
echo "Cleanup completed."
