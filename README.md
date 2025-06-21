# Arquitectuta Ninja LMS Bridge

Este repositorio contiene un ejemplo de arquitectura propuesta para el desarrollo de la integración de Ninja con el LMS de BUK

## Instalación
En la raíz del proyecto ejecutar los siguientes comandos:

```bash
# Clonar repositorio
git clone git@github.com:jjara91/ninja_lms_bridge.git

# Mover a carpeta raíz del repositorio
cd ninja_lms_bridge

# Inicializar contenedores
docker compose up -d

# Ingresar al contenedor de la API
docker exec -it api bash

# Ejecutar migraciones
bin/console d:m:m

# Ejecutar fixtures con data de ejemplo
bin/console d:f:l
```

## Ingresar API doc
Ingresar a la siguiente url http://localhost/api para entrar al swagger de la API y probar los endpoints de ejemplo.
