/* v_encounter */
CREATE OR REPLACE VIEW v_encounter AS
SELECT e.*,
v.height,v.weight,v.`bloodpressure`,v.`breathing`,v.`heartbeat`,v.`temperature`,
a.by, a.`date`, a.`familyhistory`,a.`personhistory`,a.`status`,a.`reason`,a.`refplacecode`,a.`refplace`,a.`refdiagnosis`,a.`process`,
COUNT(r.id) numrisrequest
FROM dfck_encounter e
LEFT JOIN `dfck_person_vitalsigns` v
ON v.eid = e.eid AND v.deleted_at IS NULL
LEFT JOIN `dfck_person_admissioninfo` a
ON a.eid = e.eid AND a.deleted_at IS NULL
LEFT JOIN dfck_ris_request r
ON r.eid = e.eid
GROUP BY e.eid
