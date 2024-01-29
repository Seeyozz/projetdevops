# Messagerie Web Application

Cette application Web simple vous permet d'envoyer des messages qui sont stockés dans une base de données MySQL. Les messages sont ensuite affichés sur la page.

## Prérequis

Avant de déployer cette application, assurez-vous d'avoir les éléments suivants installés sur votre système :

- [Docker](https://www.docker.com/) : Utilisé pour créer et exécuter des conteneurs Docker pour l'application.
- [Kubernetes (kubectl)](https://kubernetes.io/docs/tasks/tools/) : Utilisé pour déployer l'application dans un cluster Kubernetes.

## Déploiement

### Déploiement avec le script auto

1. Clonez ce dépôt GitHub :

   ```bash
   git clone https://github.com/WixazZ/messagerie-k8s-app.git
   ```

2. Accédez au répertoire de l'application :

    ```bash
    cd messagerie-k8s-app
    ```

3. Lancer le script qui permet de déployer automatiquement l'app
    ```bash
    ./deploy.sh deploy
    ```

#### Et voila notre application est bien lancer il suffit de rentrer l'external-ip dy service php pour pouvoir y accéder

## Suppression

### Suppression avec le script auto

1. Lancer le script qui permet de supprimer automatiquement l'app

    ```bash
    ./deploy.sh delete
    ```

2. Sortir du dossier courrant

    ```bash
    cd ..
    ```
2. Supprimer le dossier projet

    ```bash
    sudo rm -rf messagerie-k8s-app
    ```
#### Et voila plus aucune trace de l'application sur l'ordinateur