/* v_encounter */
CREATE OR REPLACE VIEW v_encounter AS
SELECT e.*,
v.height,v.weight,v.`bloodpressure`,v.`breathing`,v.`heartbeat`,v.`temperature`,
a.by, a.`date`, a.`familyhistory`,a.`personhistory`,a.`status`,a.`reason`,a.`refplacecode`,a.`refplace`,a.`refdiagnosis`,a.`process`,
(SELECT COUNT(r.id) FROM dfck_ris_request r WHERE r.eid=e.eid AND r.deleted_at IS NULL) numrisrequest,
(SELECT COUNT(r.id) FROM dfck_ris_request r WHERE r.eid=e.eid AND r.status=1) numrisresult
FROM dfck_encounter e
LEFT JOIN `dfck_person_vitalsigns` v
ON v.eid = e.eid AND v.deleted_at IS NULL
LEFT JOIN `dfck_person_admissioninfo` a
ON a.eid = e.eid AND a.deleted_at IS NULL
GROUP BY e.eid
