# Diretrizes de Testes (Testing Guidelines)

## Proibição de Criação de Testes Não Solicitados

- **Não crie testes em hipótese alguma** (testes unitários, testes de integração, testes de feature com Pest ou PHPUnit), a não ser que seja expressa e explicitamente solicitado pelo usuário.
- Nunca crie arquivos ou diretórios dentro de `tests/` por iniciativa própria ao desenvolver funcionalidades, refatorações, controllers, models, services ou migrations.
- A criação de testes deve ocorrer **única e exclusivamente** quando o usuário pedir de forma clara e direta na sua solicitação.
