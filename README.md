# Portal-Estudante
É um sistema de gerenciamento de alunos desenvolvido em PHP com banco de dados MySQL, utilizando arquitetura MVC. O sistema oferece funcionalidades para listar, adicionar e editar alunos, com interfaces responsivas para melhorar a experiência do usuário.

# Funcionalidades
**Tela Inicial:**
- A tela inicial do aplicativo exibe uma lista de alunos. Cada aluno na lista possui:
- Um título (nome do aluno)
- Uma descrição
- Uma mensagem indicando se o aluno está ativo ou não
- Botões de ação para: adicionar aluno, remover e editar.

**Tela de Adicionar, campos a serem preenchidos:**
- Nom
- Email
- Telefone
- Valor Mensalidade
- Senha
- Situação (ativo ou não)
- Observação do aluno
  
Após preencher os campos, ao pressionar o botão "Salvar", o aluno é adicionado à lista na tela inicial.

**Editar Aluno:**
- Quando o usuário clica em um aluno na tela inicial, é direcionado para uma tela onde pode editar os campos do aluno selecionado. As alterações são salvas e refletidas na tela inicial.

**Teste Automatizado de Aceitação:**
- Foi implementado um teste automatizado simples de aceitação para adicionar um aluno ao sistema. O teste utiliza as ferramentas Selenium Standalone e PHP Codeception para automatizar a interação com a interface do usuário e verificar a funcionalidade de adicionar alunos.

# Tecnologias Utilizadas
- PHP
- MySQL
- HTML/CSS
- Selenium Standalone
- PHP Codeception
- Docker
