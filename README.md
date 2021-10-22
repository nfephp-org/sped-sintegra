# sped-sintegra

SINTEGRA, Sistema Integrado de Informações sobre Operações Interestaduais com Mercadorias e Serviços, foi implantado no Brasil através do Convênio ICMS 57/1995 para facilitar o fornecimento de informações dos contribuintes às fiscalizações estaduais, permitindo o controle informatizado das operações de entradas e saídas interestaduais realizadas pelos contribuintes de ICMS.

# Finalidade

Esta biblioteca tem por finalidade auxiliar na geração do arquivo TXT no formato do Sintegra, para aqueles estados que ainda o utilizam.

A grande maioria dos Estados deixou (ou está deixando) o Sintegra de lado em favor do SPED ICMS/IPI, que é uma estrutura de declaração de dados muito mais complexa e detalhada.

## Esclarecimentos FONTE e-auditoria [BOOK](https://s3-sa-east-1.amazonaws.com/eamkt/material-comercial/ebook_osintegranaomorreu.pdf)

A apresentação do arquivo SINTEGRA foi dispensada para todos os contribuintes SOMENTE nos Estados Alagoas, Amazonas, Rio de Janeiro, Rio Grande do Sul, Rondônia, Roraima, Tocantins e Distrito Federal.

A obrigatoriedade ainda está presente em alguns estados que especificam quais são os contribuintes que devem continuar apresentando este arquivo.

Os contribuintes dos Estados do Acre, Ceará, Espírito Santo, Mato Grosso, Mato Grosso do Sul, Piauí e Santa Catarina DEVEM apresentar o SINTEGRA, os
que são optantes pelo Regime do Simples Nacional que utilizam Processamento Eletrônico de Dados para escrituração de Livros ou para emissão de documentos fiscais. Entretanto, se os contribuintes forem credenciados como emitentes de
NFC-e (Nota Fiscal de Consumidor Eletrônica) ou se não possuírem ECF (Emissor de Cupom Fiscal) autorizado, estão desobrigados do envio. Além disso, os contribuintes obrigados à escrituração da Escrituração Fiscal Digital (EFD) também estão dispensados do envio.

### AMAPÁ
O **Estado do Amapá** dispensa da entrega todos os contribuintes obrigados a apresentação da Escrituração Fiscal Digital (EFD) e os contribuintes enquadrados como Microempreendedor Individual. 

### BAHIA
O **Estado da Bahia** especifica que estão obrigados a apresentação do arquivo SINTEGRA todo contribuinte inscrito no cadastro do ICMS da Bahia com faturamento/ano no exercício anterior,
superior a R$ 360.000,00, que emita documento fiscal eletronicamente e/ou faça escrituração de Livro Fiscal por processamento de dados, mesmo se utilizar sistemas de terceiros. Aplica-se também aos usuários de Equipamentos Emissor de Cupom Fiscal (ECF) que exerçam atividade econômica de comércio por atacado e contribuinte inscrito como substituto tributário independentes de serem usuário de Sistema Eletrônico de Processamento de Dados. 

Já os contribuintes inscritos no cadastro de ICMS do Estado da Bahia como Empresas de Pequeno Porte e contribuintes inscritos na condição de Normal – NO, com faturamento no ano de 2005 inferior a R$ 72 milhões, que utilize sistemas eletrônicos exclusivamente para emissão de cupom fiscal, foram dispensadas do envio e manutenção dos arquivos SINTEGRA para movimentos datados até dezembro de 2006. 

Os contribuintes inscritos na condição de Normal – NO, com faturamento no ano de 2005 inferior a R$ 72 milhões, que utilize sistemas eletrônicos apenas para escrituração de livros fiscais e emissão de cupom fiscal, foram dispensados de enviar os registros tipo 60R (Resumo mensal por item de mercadoria do cupom fiscal) e 61R (Resumo mensal por item de mercadoria da nota fiscal de venda ao consumidor) para movimentos datados até 31 de dezembro de 2006.

### GOIÁS
No **Estado de Goiás**, somente os contribuintes optantes pelo Simples Nacional que ainda não emitem documentos fiscais eletrônicos que devem
continuar fazendo o envio do SINTEGRA.

### MARANHÃO
Para os contribuintes do **Estado do Maranhão**, que emitem documento (Nota Fiscal ou Conhecimento de Transporte) ou fazem a escrituração de Livros Fiscais por processamento de dados, inclusive, quando a escrituração for feita em escritório de contabilidade, são obrigados a remeter até o dia 15 de cada mês arquivo magnético do SINTEGRA.

### MINAS GERAIS
Em **Minas Gerais**, estão obrigados ao SINTEGRA os contribuintes que utilizam Processamento Eletrônico de Dados e/ou emitem Nota Fiscal (NF-e) e/ou Conhecimento de Transporte (CT-e) e/ou utilizam Equipamento Emissor de Cupom Fiscal (ECF). 

Já os contribuintes dispensados dessa obrigação, são todos que transmitem a Escrituração Fiscal Digital (EFD).

### PARÁ
No **Estado do Pará**, estão obrigados todos os contribuintes usuários de sistema eletrônico de Processamento Eletrônico de Dados, tanto para emissão de documentos quanto para escrituração de livros fiscais, a partir do mês de referência em que foi autorizado o uso do sistema.

O contribuinte que utilizar processamento eletrônico para emissão de notas fiscais é obrigado a declarar o documento (registro 50) e seus itens correspondentes (mercadorias – Registro 54), relativamente aos documentos de emissão própria que não tenham sido cancelados.

Os contribuintes que utilizarem equipamento Emissor de Cupom Fiscal – ECF, são obrigados a declarar as reduções Z diárias (registro 60M e 60A). 

O registro 74 somente é obrigatório no mês de fevereiro, com o inventário relativo ao fechamento do exercício anterior, para os contribuintes que escriturem o livro de inventário através do processamento eletrônico. 

Os demais registros são obrigatórios caso haja operação/prestação correspondente ao tipo de registro. 

### PARAÍBA
Os contribuintes inscritos no cadastro do **Estado da Paraíba** que devem prestar suas informações econômico/fiscais ao Estado via meio magnético, transmitindo pela internet ou entregando nas repartições fiscais, deverão fazer o SINTEGRA através do aplicativo validador SER disponível no portal do Guia de Informação Mensal (GIM). 

Os demais contribuintes (substitutos tributários) devem utilizar uma das versões do validador SINTEGRA para enviar suas declarações, dando sempre preferência para as versões mais atuais.

### PARANÁ
No **Estado do Paraná**, as empresas obrigadas à entrega do arquivo EFD e os contribuintes que utilizam a Nota Fiscal de Consumidor Eletrônica - NFC-e estão dispensadas de entregar o Arquivo Magnético do SINTEGRA.

Deve apresentar o arquivo magnético todo contribuinte que emite documento fiscal (Nota Fiscal, Cupom Fiscal ou Conhecimento de Transporte, etc) ou faça a escrituração de Livro Fiscal por processamento Eletrônico de Dados, inclusive quando a escrituração fiscal for feita em escritório de contabilidade.

### PERNANBUCO
Os contribuintes do **Estado de Pernambuco** obrigados a entregar o SEF (Sistema de Escrituração Fiscal) estão dispensado da entrega do SINTEGRA. Já o contribuinte de outro Estado e com inscrição de Substituto Tributário (ST) em Pernambuco deve apresentar a informação em arquivo magnético SINTEGRA.

### RIO GRANDE DO NORTE
Os contribuintes do **Rio Grande do Norte** que emitem documento fiscal (Nota Fiscal ou Conhecimento de Transporte) por processamento de dados ou fazem a escrituração de Livro Fiscal por processamento de dados,inclusive, quando a escrituração fiscal for feita em escritório de contabilidade, contribuintes que utilizem equipamento Emissor de Cupom Fiscal(ECF) que tenha condições de gerar arquivo magnético, por si ou quando conectado a outro computador, estão obrigados a entrega do SINTEGRA.

### SERGIPE
Os contribuintes do **Estado de Sergipe** que fazem uso de Sistema Eletrônico de Processamento de Dados para emissão de documentos e/ou livros fiscais estão obrigados - desde setembro de 2000, a remeterem à SEFAZ, mensalmente, os arquivos magnéticos gerados por esse sistema e previamente submetidos à crítica do programa validador do SINTEGRA.

### SÃO PAULO
Os contribuintes do **Estado de São Paulo** que fazem emissão por sistema eletrônico de processamento de dados dos documentos fiscais previstos no Artigo 124 do RICMS, aprovado pelo Decreto 45.490, de 30 de novembro de 2000, bem como a escrituração dos livros fiscais, estão obrigados a apresentação do arquivo magnético SINTEGRA.

Já os contribuintes obrigados à entrega da Escrituração Fiscal Digital (EFD) estão dispensados de enviar os arquivos do Sintegra, pois a EFD já contém a totalidade das informações fiscais. 

A SEFAZ/SP solicita, na notificação, a entrega mensal de arquivos, isto é, o contribuinte paulista notificado passa a ter a obrigação permanente (todos os meses) de entregar o arquivo para a SEFAZ/SP.

## INSTALAÇÃO
**Este pacote está listado no [Packgist](https://packagist.org/) foi desenvolvido para uso do [Composer](https://getcomposer.org/), portanto não será explicitada nenhuma alternativa de instalação.**

*E deve ser instalado com:*
```bash
composer require nfephp-org/sped-sintegra
```

Ou ainda alterando o composer.json do seu aplicativo inserindo:
```json
"require": {
    "nfephp-org/sped-sintegra" : "^1.0"
}
```

*Para utilizar o pacote em desenvolvimento (branch master) deve ser instalado com:*
```bash
composer require nfephp-org/sped-sintegra:dev-master
```

*Ou ainda alterando o composer.json do seu aplicativo inserindo:*
```json
"require": {
    "nfephp-org/sped-sintegra" : "dev-master"
}
```

## REQUISITOS
- PHP 7.x ou maior

## DOCUMENTAÇÃO
- a ser feita

*NOTA: a forma basica de uso pode ser vista na pasta examples*

## CONTRIBUIÇÕES
Para contribuir com correções de BUGS, melhoria no código, documentação, elaboração de testes ou qualquer outro auxílio técnico e de programação por favor observe o [CONTRIBUTING](CONTRIBUTING.md) e o  [Código de Conduta](CONDUCT.md) para maiores detalhes.

## TESTES E FUNCIONALIDADES
Todos os testes são desenvolvidos para operar com o PHPUNIT, e novas funcionalidades devem ser propostas (VIA PR) na branch testing, para depois serem incorporadas ao codigo principal, caso sejam aceitas.

## SEGURANÇA
Caso você encontre algum problema relativo a segurança, por favor envie um email diretamente aos mantenedores do pacote ao invés de abrir um ISSUE.

## CREDITOS
Roberto L. Machado (owner and developer)

Ismael A. Goncalves (developer)

Cleiton Perin (developer)

Gustavo Lidani (developer)

## LICENÇA
Este pacote está diponibilizado sob LGPLv3 ou MIT License (MIT). Leia  [Arquivo de Licença](LICENSE.md) para maiores informações.


