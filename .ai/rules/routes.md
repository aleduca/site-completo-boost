---
paths:
  - 'routes/**'
---

# Routes

## Never use closures in routes
Nunca utilize closures ou funções anônimas nos arquivos de rotas. Todas as rotas devem sempre apontar para métodos em Controllers dedicados (ou invokable controllers) para garantir que as rotas sejam 100% cacheáveis (`php artisan route:cache`).
