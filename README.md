**Get Users**
----
  Returns json data about all users.

* **URL**

  /user

* **Method:**

  `GET`
  
*  **URL Params**

  None

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{ id : 1, name : "John", surname : "Doe", address : "Sth 23, CZ", employer : "Smith" }]`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ "0 records for users" }`

**Get User by ID**
----
  Returns json data about a user by id.

* **URL**

  /user/:id

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ id : 1, name : "John", surname : "Doe", address : "Sth 23, CZ", employer : "Smith" }`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ "0 records for users" }`
    
**Post User**
----
  Returns id of created user.

* **URL**

  /user/

* **Method:**

  `POST`
  
*  **URL Params**

   none

* **Data Params**

  * **Required:**<br />
  `name=[string]`<br />
  `surname=[string]`
  
  * **Optional**<br />
  `address=[string]`<br />
  `employer=[string]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ <user_id> }`
 
* **Error Responses:**

  * **Code:** 406 NOT ACCEPTABLE <br />
    **Content:** `{ "Name and surname must be filled" }`
    
**Put User**
----
  Returns json data with user id.

* **URL**

  /user/:id

* **Method:**

  `PUT`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Data Params**

  * **Optional**<br />
  `name=[string]`<br />
  `surname=[string]`<br />
  `address=[string]`<br />
  `employer=[string]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ "User with id <id> was updated successfully" }`
 
* **Error Responses:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ "User with id <id> doesn't exist" }`
    
  * **Code:** 406 NOT ACCEPTABLE <br />
    **Content:** `{ "Name can not be empty" }`
    
  * **Code:** 406 NOT ACCEPTABLE <br />
      **Content:** `{ "Surname can not be empty" }`
   
 **Delete User**
 ----
   Returns json data with user id.
 
 * **URL**
 
   /user/:id
 
 * **Method:**
 
   `DELETE`
   
 *  **URL Params**
 
    **Required:**
  
    `id=[integer]`
 
 * **Data Params**
 
   none
 
 * **Success Response:**
 
   * **Code:** 200 <br />
     **Content:** `{ "User with id <id> was deleted successfully" }`
  
 * **Error Responses:**
 
   * **Code:** 404 NOT FOUND <br />
     **Content:** `{ "User with id <id> doesn't exist" }`
    