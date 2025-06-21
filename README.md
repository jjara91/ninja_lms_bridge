# Arquitectuta Ninja LMS Bridge

Este repositorio contiene un ejemplo de arquitectura propuesta para el desarrollo de la integración de Ninja con el LMS de BUK

## Instalación
En la raíz del proyecto ejecutar los siguientes comandos:

```bash
# Inicializar contenedores
docker compose up -d

# Ingresar al contenedor de la API
docker exec -it api bash

# Ejecutar fixtures con data de ejemplo
bin/console d:f:l
```

## Ingresar API doc
Ingresar a la siguiente url http://localhost/api para entrar al swagger de la API y probar los endpoints de ejemplo.
