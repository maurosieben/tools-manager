CREATE DATABASE IF NOT EXISTS siemens_tools;
USE siemens_tools;

CREATE TABLE lista (serial VARCHAR(20) NOT NULL, descri VARCHAR(20) NOT NULL, cse VARCHAR(20), calib  DATE, PRIMARY KEY (serial));
