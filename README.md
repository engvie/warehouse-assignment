
# Code Assignment

Built as a backoffice communicating with an API.

- API: Laravel 9
- Backoffice: Vite.js with Vue 3 using composition api (SPA)


## The project contains:


- Authentication with bearer token. Login, logout, view profile data
- Importing products and inventory with drag-n-drop function. Request is sent to the API where the .json files are imported into the database.
- View products and its availability. Also listing each belonging component/part to the product with its stock.



The backend is built in laravel with e.g:
- Migrations
- Controllers
- Models
- Resources (Transforming data to the api endpoint)
- Repositories (Centralizing functionality)

### The Data
- I call the table and chair "Products".
- I call the components that are the components of the product (e.g screw, legs), "Product components".
- There is three tables: products, product_components, inventories.
- One product has many product_components.
- One product_component has one row in inventories.
- I only store the stock of the product components (inventory.json) inside inventories then I calculate if the product is available depending on the product components. I only want one source of truth. Especially when it comes to stock value.
- The API returns an validation error if the user tries to buy a product that contains a component that are out-of-stock.

## Images of the result


![Login](readme-images/login.png)

![Upload](readme-images/upload.png)

![Products](readme-images/products.png)

![Products out-of-stock](readme-images/products-outofstock.png)
