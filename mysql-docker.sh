CONTAINER=exambuddy-mysql
DATABASE=wordpress

# Backup
docker exec $CONTAINER /usr/bin/mysqldump -u root --password=$MYSQL_ROOT_PASSWORD $DATABASE > db/backup.sql

# Restore
#cat db/backup.sql | docker exec -i $CONTAINER /usr/bin/mysql -u root --password=$MYSQL_ROOT_PASSWORD $DATABASE
