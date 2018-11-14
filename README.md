# Test case by mk

## How it use

Set up a connection to your database in the .env.local file    
`DATABASE_URL="mysql://db_user:db_pass@127.0.0.1:3306/db_name"`

Run the following commands to install   
`git clone https://github.com/KostiaBenner/testcasemk.git`    
`composer install`    
`php bin/console doctrine:migrations:migrate`    

To add news, use the command:   
`php bin/console app:create-news --title="News title" --text="News text"`
