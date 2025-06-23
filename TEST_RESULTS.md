# Resultados de Pruebas

Este repositorio incluye un conjunto de 50 pruebas sencillas de caja blanca.

| Módulo Evaluado | Nº de Casos de Prueba | Casos Exitosos | Casos Fallidos | Porcentaje de Éxito (%) |
|-----------------|----------------------|---------------|---------------|-------------------------|
| Pruebas de Lógica | 50                   | 50            | 0             | 100%                    |

El total de pruebas ejecutadas, incluyendo las pruebas existentes, es 52 y todas finalizan correctamente.

Para ejecutar la suite de pruebas se puede usar:

```bash
APP_KEY=<clave> ./vendor/bin/phpunit
```

Donde `<clave>` es una clave de aplicación válida generada mediante `php artisan key:generate --show`.
