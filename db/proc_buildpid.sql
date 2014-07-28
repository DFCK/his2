DELIMITER $$
DROP PROCEDURE IF EXISTS `buildpid`$$
     CREATE PROCEDURE buildpid (IN province INT(11),OUT inoutcode INT )
     BEGIN
     DECLARE vcrrnum INT(11);
     SELECT current INTO vcrrnum FROM dfck_autoid WHERE name=CONCAT('pid', province) LIMIT 0,1;
     SET inoutcode = vcrrnum + 1;
     UPDATE dfck_autoid SET current = inoutcode WHERE name=CONCAT('pid', province) LIMIT 1;
     END$$