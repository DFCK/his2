DELIMITER $$
DROP PROCEDURE IF EXISTS `buildeid`$$
     CREATE PROCEDURE buildeid (IN hospital_bhyt INT(11),OUT inoutcode INT )
     BEGIN
     DECLARE vcrrnum INT(11);
     SELECT current INTO vcrrnum FROM dfck_autoid WHERE name=CONCAT('eid', hospital_bhyt) LIMIT 0,1;
     SET inoutcode = vcrrnum + 1;
     UPDATE dfck_autoid SET current = inoutcode WHERE name=CONCAT('eid', hospital_bhyt) LIMIT 1;
     END$$