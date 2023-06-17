pipeline {
  agent any
  stages {
    stage('build') {
      agent any
      steps {
        echo 'starting clone'
        sh 'composer install'
        sh 'phpunit'
      }
    }

  }
  environment {
    db = 'mysql'
  }
}