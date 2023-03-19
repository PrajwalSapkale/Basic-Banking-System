DROP TABLE IF EXISTS cust_info;
CREATE TABLE cust_info (ID INTEGER PRIMARY KEY, C_NAME VARCHAR (50), EMAIL VARCHAR (50), BALANCE DOUBLE NOT NULL);

INSERT INTO cust_info (ID , C_NAME , EMAIL , BALANCE) VALUES 
(1, "Prajwal Sapkale", "prajwalsapkale@gmail.com", 150000), 
(2, "Ashutosh Zope", "zopeashutosh@gmail.com", 135000),
(3, "Vidit Pawar", "pawarvidit@gmail.com", 140000), 
(4, "Shubham Ram", "shubhamram@gmail.com", 155000), 
(5, "Krishna Mishra", "mishra_krishna@gmail.com", 120000), 
(6, "Rugved Redkar", "rugved_redkar@gmail.com", 130000),
(7, "Pranav Ekbote", "ekbotepranav@gmail.com", 125000), 
(8, "Kiran Jadhav", "kiranjadhav00gmail.com", 130000),
(9, "Sachin Yadav", "yadav$achin@gmail.com", 125000), 
(10, "Aniket Patil", "aniketpatil@gmail.com", 140000);

DROP TABLE IF EXISTS TRANSACTION;
CREATE TABLE TRANSACTION (SR_NO INT(5) NOT NULL, SENDER VARCHAR (50), 
RECEIVER VARCHAR (50), AMOUNT INT (15) NOT NULL, DATETIME DATETIME NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- DUMMY TRANSACTION RECORD
--

INSERT INTO TRANSACTION (SR_NO, SENDER, RECEIVER, AMOUNT, DATETIME) VALUES
(1, "Shubham Ram", "Krishna Mishra", 9500, "2023-01-15 10:08:56"),
(2, "Kiran Jadhav", "Rugved Redkar", 19000, "2023-01-27 13:47:23"),
(3, "Krishna Mishra", "Sachin Yadav", 8500, "2023-02-08 14:55:43"),
(4, "Pranav Ekbote", "Vidit Pawar", 21000, "2023-02-17 16:38:25"),
(5, "Shubham Ram", "Aniket Patil", 15000, "2023-02-22 21:19:16"),
(6, "Kiran Jadhav", "Ashutosh Zope", 7000, "2023-03-05 19:21:06");

ALTER TABLE TRANSACTION
  ADD PRIMARY KEY (SR_NO);

ALTER TABLE TRANSACTION
  MODIFY SR_NO INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;