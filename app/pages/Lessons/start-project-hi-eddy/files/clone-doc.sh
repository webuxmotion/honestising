# clone repo
git clone https://github.com/webuxmotion/honestising.git

# go to folder
cd honestising

docker-compose up -d

composer install

npm i

cp .env.example .env