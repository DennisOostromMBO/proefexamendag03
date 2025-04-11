CREATE PROCEDURE GetAllBanen()
BEGIN
    SELECT 
        r.id AS reservering_id, 
        CONCAT(p.voornaam, ' ', IFNULL(p.tussenvoegsel, ''), ' ', p.achternaam) AS naam,
        r.datum,
        r.aantal_volwassen,
        r.aantal_kinderen,
        b.nummer AS baan
    FROM 
        reserveringen r
    INNER JOIN 
        persoons p ON r.persoon_id = p.id -- Updated table name to 'persoons'
    INNER JOIN 
        baans b ON r.baan_id = b.id; -- Updated table name to 'baans'
END;
