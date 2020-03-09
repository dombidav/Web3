CREATE TABLE employees( id INT NOT NULL AUTO_INCREMENT, name VARCHAR(250) NOT NULL, ssn CHAR(9) NOT NULL, tin CHAR(10) NOT NULL, CONSTRAINT pk_employees PRIMARY KEY(id), CONSTRAINT UQ_employees_ssn UNIQUE(ssn), CONSTRAINT UQ_employees_tin UNIQUE(tin) )