#!/bin/bash

# Warna teks
GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m' # No Color

echo -e "${GREEN}🚀 Memulai setup project Laravel...${NC}"

# 1. Install Composer dependencies
echo -e "${GREEN}📦 Menjalankan composer install...${NC}"
composer install
if [ $? -ne 0 ]; then
    echo -e "${RED}❌ Gagal install composer dependencies.${NC}"
    exit 1
fi

# 2. Copy .env jika belum ada
if [ ! -f ".env" ]; then
    echo -e "${GREEN}📄 Menyalin .env.example menjadi .env...${NC}"
    cp .env.example .env
else
    echo -e "${GREEN}✅ File .env sudah ada, skip copy.${NC}"
fi

# 3. Generate application key
echo -e "${GREEN}🔑 Men-generate APP_KEY...${NC}"
php artisan key:generate

# 4. Jalankan migrasi database
echo -e "${GREEN}🧱 Menjalankan migrate...${NC}"
php artisan migrate

# 6. Install dan build frontend assets
if [ -f "package.json" ]; then
    echo -e "${GREEN}📦 Menjalankan npm install...${NC}"
    npm install

    echo -e "${GREEN}🛠️  Menjalankan build Vite...${NC}"
    npm run build
else
    echo -e "${RED}⚠️  package.json tidak ditemukan, skip build frontend.${NC}"
fi

# 5. Jalankan Laravel di localhost
echo -e "${GREEN}🌐 Menjalankan server Laravel di http://localhost:8000 ...${NC}"
php artisan serve
