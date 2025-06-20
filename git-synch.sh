#!/bin/bash

GREEN='\033[0;32m'
NC='\033[0m'

echo -e "${GREEN}==> Menarik perubahan dari origin/main...${NC}"
git pull origin main

echo -e "${GREEN}==> Menambahkan semua perubahan...${NC}"
git add .

read -p "Masukkan pesan commit: " msg
git commit -m "$msg"

echo -e "${GREEN}==> Mengirim perubahan ke origin/main...${NC}"
git push origin main

echo -e "${GREEN}✅ Selesai!${NC}"