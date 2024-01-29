#!/bin/bash

# Définir le nom du fichier YAML
FILE="./projet.yaml"

# Fonction pour déployer
deploy() {
    # Naviguer vers le répertoire de l'application
    cd ./app

    # Construire l'image Docker
    sudo docker build -t web_app:v1 .

    # Naviguer vers le répertoire du script k8s
    cd ..

    # Appliquer le fichier YAML au cluster Kubernetes
    kubectl apply -f $FILE

    # Vérifier le statut du déploiement et du service
    kubectl get pods,deployment,service -n projet
}

# Fonction pour supprimer
delete() {

    # Supprimer les ressources Kubernetes
    kubectl delete -f $FILE

    sudo  docker rmi web_app:v1
    sudo docker rmi mysql
}

# Vérifier l'argument passé
if [ "$1" = "deploy" ]; then
    deploy
elif [ "$1" = "delete" ]; then
    delete
else
    echo "Argument non reconnu. Utiliser 'deploy' ou 'delete'."
fi
