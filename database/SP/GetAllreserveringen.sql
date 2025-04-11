CREATE PROCEDURE GetAllReserveringen()
BEGIN
    SELECT 
        CONCAT(p.voornaam, ' ', IFNULL(p.tussenvoegsel, ''), ' ', p.achternaam) AS naam,
        r.datum,
        r.aantal_uren,
        r.begin_tijd,
        r.eind_tijd,
        r.aantal_volwassen,
        r.aantal_kinderen
    FROM 
        reserveringen r
    INNER JOIN 
        persoons p ON r.persoon_id = p.id;
END;
