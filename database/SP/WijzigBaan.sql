CREATE PROCEDURE WijzigBaan(
    IN reserveringId INT,
    IN nieuwBaanId INT
)
BEGIN
    DECLARE aantal_kinderen INT;

    -- Fetch the number of children in the reservation
    SELECT aantal_kinderen INTO aantal_kinderen
    FROM reserveringen
    WHERE id = reserveringId;

    -- Check if the baan is unsuitable for children and the reservation includes children
    IF aantal_kinderen > 0 THEN
        IF (SELECT heeft_hek FROM baans WHERE id = nieuwBaanId) = 0 THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Deze baan is ongeschikt voor kinderen omdat deze geen hekjes heeft';
        END IF;
    END IF;

    -- Update the baan_id for the given reservering
    UPDATE reserveringen
    SET baan_id = nieuwBaanId
    WHERE id = reserveringId;

    -- Return success message
    SELECT 'Het baannummer is gewijzigd' AS success_message;
END;
