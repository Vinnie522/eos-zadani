# **DOKUMENTACE**
Vytvořená aplikace přes framework Laravel implementující JSON REST API slouží  pro jednoduchou správu členů. Poskytuje rozhraní, pomocí kterého můžete vytvářet, číst, aktualizovat a mazat členy. Je navržena tak, aby umožňovala propojení členů s jejich štítky, umožňovala validaci vstupních dat a poskytovala jednotný přístup k členským informacím včetně přiřazených štítků.
## **Prvotní spuštění**
Hned na začátku je dobré upravit konfigurační soubor .env pro připojení k databázi. Osobně jsem zvolil MySQL.

Základními příkazy pro správný běh laravel aplikace jsou:
```c
php artisan migrate //slouží k provedení databázových migrací
php artisan db:seed //slouží k naplnění databáze testovacími daty
php artisan serve //slouží k spuštění vývojového serveru pro vaši Laravel aplikaci.
```
Zároveň pro snadnou manipulaci a práci s daty doporučuju využít aplikaci **PostMan** [https://www.postman.com/], ve které si jednoduše zvolíte jakoukoliv HTTP podporovatelnou metodu a zároveň parametr pro např. vložení nové člena přes JSON.
## **API**
_Veškeré routes jsou k dispozici v  adresáři routes/api.php_
### **Získání seznamu všech členů**
Získání všech členů je realizováno přes **GET /api/members**. V doporučené aplikace **PostMan** zvolíte metodu GET a se základní localhost URL adresou [http://127.0.0.1:8000/api/members].

### **Vytvoření nového člena**
U vytvoření novéhlo člena postupujete zvolením metody POST a stejné adresy jako u předchozí API, zároveň je nutné zvolit možnost **raw** a typ **JSON** a přidat např. následující kód: 
```json
{
"jmeno": "John",
"prijmeni": "Doe",
"email": "john.doe@example.com",
"narozeni": "1990-01-01",
"tag_id": 2
}
```
Aby nedošlo ke špatnému vložení atributů jsou data validována pomocí předurčených metod. Pro vložení štítku se udává jeho ID, které je následně uloženo do spojovací tabulky N:N společně s ID uživatele.

### **Získání informací člena podle jeho ID**
Pro načtení informací o členu stačí zadat **GET /api/members/{id}**.

### **Změna informací člena podle jeho ID**
Změna je provedena přes HTTP metodu **PATCH** v následujícím tvaru **PATCH /api/members/{id}**.
Pro výslednou změnu přidejte následující strukturu:
```json
{
"jmeno": "John",
"prijmeni": "Doe",
"email": "john.doe@example.com",
"narozeni": "1990-01-01"
}
```
Zde opět probíhá validace dat a ověření existujícího ID člena.
### **Vymazání člena podle ID**
K vymazání dat ze serveru slouží metoda **DELETE**. Stačí využít **DELETE /api/members/{id}**. 

### **Přidání štítku k členovi podle ID**
Stačí využít **POST /api/mebers/tag/{id}**. Během zápisu do databáze proběhne zároveň validace, zda vůbec daný uživatel existuje, nebo zda stejná hodnota už není uložená pod ID uživatele.
```json
{
"tag_id": 1
}
```


_Děkuji, že jste si přečetli tuto krátkou dokumentaci. Doufám, že vám poskytla užitečné informace o celé aplikaci. Pokud máte další otázky nebo potřebujete rozšířenější informace neváhejte mě kontaktovat._












