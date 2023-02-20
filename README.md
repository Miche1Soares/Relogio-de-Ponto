# Relógio de Ponto

Este projeto teve como objetivo criar um Relógio de Ponto em que haveria uma navegação intuitiva e armazenamento das informações em um banco de dados.

## Tecnologias utilizadas:

1.  Front-End:
    
    -   HTML5
    -   CSS3
    -   Framework Bootstrap

  

2.  Back-End:
    
    -   PHP
    -   Banco de dados relacional MySQL

---  

### Tabelas do Banco de Dados

No banco de dados foram criadas duas tabelas, "tb_users" e "tb_horas", que durante a execução do programa se relacionam entre si.

**tb_horas**

|  | id_user_horas | data | entrada | s_almoco | r_almoco | saida |
|--|--|--|--|--|--|--|
|**type**| int | varchar | varchar | varchar | varchar | varchar |

**tb_users**

|  | id_user | nome | 
|--|--|--|
| **type** | int | varchar |

---  

### Página Inicial

A página inicial é constituida por:

- Uma página de *login*, com um campo destinado à inserção do ID do usuário.
- Uma caixa de confirmação, inicialmente oculta.

Ao inserir um valor de ID aparecerá a caixa de confirmação com o nome do usuário correspondente ao ID digitado junto as opções de **SIM**, para prosseguir, e **NÃO**, para reiniciar a página.

![pagina-inicial-edit](https://user-images.githubusercontent.com/80423723/220177908-69fad0b0-b7f3-4986-b55e-ed991b05de8c.gif)

### Página de Bater Ponto

A página de bater o ponto é constituída por:

-   Um  _header_  contendo o nome do usuário logado e um botão de sair, que faz o *logout* da sessão.
    
-   Um  _body_  contendo um campo com o horário em tempo real que, quando há o clique, registra a data, o horário e o usuário no banco de dados. Logo abaixo há outro campo com as datas e horários dos pontos batidos por esse usuário anteriormente.

Logo após o clique para registrar o ponto é mostrado outra caixa de confirmação com o nome do usuário, data e o horário inserido.

![pagina-de-bater-ponto-edit](https://user-images.githubusercontent.com/80423723/220177944-b9fc7995-1ce5-428d-9717-a530073f425d.gif)
