# Sistema de Requisitos Funcionais

## Objetivo do Sistema
O sistema de almoxarifado tem como objetivo controlar a entrada, saída e organização de materiais e produtos armazenados, facilitando o gerenciamento do estoque da empresa.

---

# 1. Requisitos Funcionais (RF)

## RF01 - Cadastro de Usuários
O sistema deve permitir o cadastro de usuários com login e senha.

## RF02 - Login no Sistema
O sistema deve permitir que usuários façam login utilizando e-mail e senha.

## RF03 - Cadastro de Produtos
O sistema deve permitir cadastrar produtos contendo:
- Nome
- Código
- Quantidade
- Categoria
- Fornecedor
- Data de entrada

## RF04 - Controle de Estoque
O sistema deve atualizar automaticamente a quantidade dos produtos no estoque.

## RF05 - Entrada de Produtos
O sistema deve registrar entradas de materiais no almoxarifado.

## RF06 - Saída de Produtos
O sistema deve registrar retiradas de materiais do estoque.

## RF07 - Consulta de Produtos
O sistema deve permitir pesquisar produtos pelo nome ou código.

## RF08 - Relatórios
O sistema deve gerar relatórios de:
- Produtos em estoque
- Produtos em falta
- Histórico de movimentações

## RF09 - Exclusão de Produtos
O sistema deve permitir remover produtos cadastrados.

## RF10 - Edição de Produtos
O sistema deve permitir alterar informações dos produtos.

---

# 2. Requisitos Não-Funcionais (RNF)

## RNF01 - Segurança
O sistema deve proteger os dados dos usuários através de autenticação.

## RNF02 - Desempenho
O sistema deve responder às ações do usuário em até 3 segundos.

## RNF03 - Interface
O sistema deve possuir interface simples e intuitiva.

## RNF04 - Compatibilidade
O sistema deve funcionar em computadores e celulares.

## RNF05 - Disponibilidade
O sistema deve estar disponível 24 horas por dia.

## RNF06 - Backup
O sistema deve realizar backup automático das informações.

---

# 3. Regras de Negócio (RN)

## RN01
Não será permitida saída de produtos com quantidade menor que zero.

## RN02
Somente usuários cadastrados poderão acessar o sistema.

## RN03
Todo produto deve possuir código único.

## RN04
Produtos com estoque abaixo de 5 unidades deverão ser sinalizados.

## RN05
Toda movimentação de entrada e saída deverá ser registrada no histórico.

## RN06
Apenas administradores poderão excluir produtos.