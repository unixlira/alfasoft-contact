# Aplicativo de gerenciamento de contatos

## Índice
- [Introdução](#introdução)
- [Considerações](#considerações)
- [Requisitos Adicionais](#requisitos-adicionais)

## Introdução

Este é um aplicativo simples de gerenciamento de contatos desenvolvido com a estrutura Laravel. O objetivo deste aplicativo é gerenciar uma lista de contatos, cada um com quatro campos: ID, Nome, Contato e Endereço de Email. Este README fornece algumas considerações importantes e requisitos adicionais para o desenvolvimento da aplicação.

## Considerações

1. **Campos de contato:**
    - **ID:** Um identificador exclusivo para cada contato.
    - **Nome:** Deve ser uma string de qualquer tamanho maior que 5 caracteres.
    - **Contato:** Deve consistir em 9 dígitos.
    - **Endereço de e-mail:** Deve ser um endereço de e-mail válido.

2. **Página Índice:**
    - Cada linha da página de índice deve exibir as informações do contato.
    - Cada linha deve conter um link para editar o contato.
    - Cada linha deve ter um botão para exclusão reversível do contato, utilizando o recurso de exclusão reversível do Laravel.

3. **Página de detalhes de contato:**
    - A página de detalhes do contato deve exibir todos os campos do contato.
    - Deve incluir links para editar o contato e para excluir o contato de forma reversível.

4. **Singularidade:**
    - O contato e o endereço de e-mail devem ser únicos. Dois contatos não podem ter o mesmo número de contato ou endereço de e-mail.

5. **Estrutura do banco de dados:**
    - Quaisquer informações ou dados necessários da estrutura do banco de dados devem ser adicionados usando migrações e/ou sementes. Isso garante que o banco de dados esteja configurado corretamente e possa ser facilmente replicado.

6. **Recursos nativos do Laravel:**
    - Sempre use os recursos nativos do Laravel quando possível, incluindo rotas, controladores, regras de validação de formulário, exclusões suaves e outras funcionalidades integradas. Isso garante um processo de desenvolvimento consistente e eficiente.

## Requisitos adicionais

Além das considerações mencionadas acima, os seguintes requisitos devem ser implementados se o tempo permitir durante o desenvolvimento e teste da aplicação:

1. **Autenticação:**
    - Permitir que qualquer pessoa visualize a lista de contatos, mas restringir o acesso a outros recursos (edição e exclusão) a usuários autenticados. Você pode criar uma conta de usuário estática para essa finalidade.
