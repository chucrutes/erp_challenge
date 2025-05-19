## Set up

### 1.There is a mysql compose file if you want to run the container for the db server:
```bash
docker compose up -d
```
### 2. Run Database Migrations

```bash
php spark migrate
```

### 3. Run Database Migrations

```bash
php spark serve
```

