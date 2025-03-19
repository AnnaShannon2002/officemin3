/* If need to restart database, use 

"drop database officemin;" 

*/
/* 
In phpMyAdmin, drop this code in the officemin SQL text box to populate table in database.
*/
CREATE TABLE users
(
    id int primary key auto_increment,
    username varchar(255),
    password varchar(255)
);
