# 🧪 LaboratorioDeDu

Projeto pessoal desenvolvido em WordPress utilizando Docker, WSL2 e boas práticas de engenharia.
Este repositório armazena **apenas código-fonte próprio** (tema custom e plugins), mantendo o WordPress core
e arquivos gerados fora do versionamento.

Ideal para um ambiente de desenvolvimento limpo, reproduzível e pronto para deploy em produção.

---

## 🚀 Tecnologias & Stack

- **WordPress** (core dentro do container)
- **Docker** & **Docker Compose**
- **WSL2** (Ubuntu)
- **PHP 8.2**
- **MariaDB 10.11**
- **Tema custom:** `laboratoriodedu`
- **Plugins custom:** prefixo `laboratoriodedu-`
- **Git & GitHub**

---

## 📂 Estrutura do Projeto

labDeDu/
├── docker-compose.yml
├── .env
├── .gitignore
└── wp-content/
├── plugins/
│ └── laboratoriodedu-meuplugin/
└── themes/
└── laboratoriodedu/


### O que é versionado:
- Tema custom (`wp-content/themes/laboratoriodedu`)
- Plugins custom (`wp-content/plugins/laboratoriodedu-*`)
- Arquivos de config (`docker-compose.yml`, `.env.example`)

### O que NÃO é versionado:
- Core do WordPress
- Uploads
- Banco de dados
- Plugins externos
- Qualquer arquivo gerado

---

## 🐳 Ambiente de Desenvolvimento (Docker + WSL2)

### **1. Pré-requisitos**

- Windows 10/11
- **Docker Desktop** (com WSL2 backend habilitado)
- Ubuntu (WSL2)
- VS Code (opcional, recomendado)
- Extensão **Remote - WSL** (VS Code)

---

## ⚙️ Instalação e Setup

### **1. Clone o repositório**

```bash
git clone https://github.com/SEU-USUARIO/laboratoriodedu.git
cd laboratoriodedu


2. Configurar variáveis de ambiente
cp .env.example .env


3. Subir os containers
docker compose up -d

4. Acessar o WordPress
http://localhost:8080
