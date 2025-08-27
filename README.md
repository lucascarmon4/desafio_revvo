# Desafio Revvo

Este repositório contém a implementação do desafio **Revvo**.

## ⚙️ Como rodar localmente

1. Clone este repositório:

    ```bash
    git clone https://github.com/lucascarmon4/desafio_revvo.git
    ```

2. Entre na pasta `public` e rode um servidor PHP local:

    ```bash
    php -S localhost:8000 -t public
    ```

3. Abra no navegador: [http://localhost:8000](http://localhost:8000).

## 📌 Observações

-   O desenvolvimento foi feito em **PHP puro**, sem frameworks.
-   Os dados são manipulados em **$\_SESSION** como mock de persistência.
-   As imagens são salvas em `/assets/images/courses`.
-   Mensagens de feedback (flash messages) são exibidas após operações de CRUD.
