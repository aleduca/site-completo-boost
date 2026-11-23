---
paths:
  - 'app/Http/Controllers/**'
---

# Controllers

## Use Form Requests for controller validation
Sempre que houver validação nos controllers, deve ser utilizado um Form Request dedicado em `App\Http\Requests` em vez de validação inline (`$request->validate()`). Recupere os dados validados através de `$request->validated()` ou `$request->safe()`. Nunca utilize validação inline diretamente nos controllers.
