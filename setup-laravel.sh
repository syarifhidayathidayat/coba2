#!/bin/bash

# Warna teks
GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m' # No Color

echo -e "${GREEN}🚀 Memulai setup project Laravel...${NC}"

# ========================================================
# 0. CEK & INSTALL COMPOSER (JIKA BELUM ADA)
# ========================================================
if ! command -v composer &> /dev/null; then
    echo -e "${RED}❗ Composer belum terpasang.${NC}"

    # Deteksi Windows Git Bash (jika ada msys di OSTYPE)
    if [[ "$OSTYPE" == "msys" ]]; then
        echo -e "${RED}⚠️ Deteksi sistem Windows. Silakan install Composer manual:${NC}"
        echo -e "${GREEN}https://getcomposer.org/download/${NC}"
        exit 1
    fi

    echo -e "${GREEN}📥 Mengunduh dan memasang Composer...${NC}"
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php

    # Pindahkan ke /usr/local/bin (Linux/WSL)
    sudo mv composer.phar /usr/local/bin/composer
    php -r "unlink('composer-setup.php');"

    echo -e "${GREEN}✅ Composer berhasil dipasang.${NC}"
else
    echo -e "${GREEN}✅ Composer sudah tersedia.${NC}"
fi

# ========================================================
# 1. INSTALL DEPENDENSI COMPOSER
# ========================================================
echo -e "${GREEN}📦 Menjalankan composer install...${NC}"
composer install
if [ $? -ne 0 ]; then
    echo -e "${RED}❌ Gagal install composer dependencies.${NC}"
    exit 1
fi

# ========================================================
# 2. COPY .env JIKA BELUM ADA
# ========================================================
if [ ! -f ".env" ]; then
    echo -e "${GREEN}📄 Menyalin .env.example menjadi .env...${NC}"
    cp .env.example .env
else
    echo -e "${GREEN}✅ File .env sudah ada, skip copy.${NC}"
fi

# ========================================================
# 3. GENERATE APP KEY
# ========================================================
echo -e "${GREEN}🔑 Men-generate APP_KEY...${NC}"
php artisan key:generate

# ========================================================
# 4. MIGRASI DATABASE
# ========================================================
echo -e "${GREEN}🧱 Menjalankan migrate...${NC}"
php artisan migrate

# ========================================================
# 5. INSTALL & BUILD FRONTEND (JIKA ADA)
# ========================================================
if [ -f "package.json" ]; then
    echo -e "${GREEN}📦 Menjalankan npm install...${NC}"
    npm install

    echo -e "${GREEN}🛠️  Menjalankan build Vite...${NC}"
    npm run build
else
    echo -e "${RED}⚠️  package.json tidak ditemukan, skip build frontend.${NC}"
fi

# ========================================================
# 6. BUAT SYMLINK STORAGE
# ========================================================
echo -e "${GREEN}🔗 Membuat symbolic link public/storage...${NC}"
if [ -L "public/storage" ]; then
    echo -e "${GREEN}✅ Symlink sudah ada, skip storage:link.${NC}"
else
    php artisan storage:link
fi

# ========================================================
# 7. JALANKAN SERVER
# ========================================================
echo -e "${GREEN}🌐 Menjalankan Laravel di http://localhost:8000 ...${NC}"
php artisan serve
