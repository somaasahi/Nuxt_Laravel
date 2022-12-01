cp env.example .env
docker compose build
docker compose up -d
cd frontend
(npm install --save nuxt)
npm run dev