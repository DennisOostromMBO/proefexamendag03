CREATE PROCEDURE WijzigBaan(
    IN reserveringId INT,
    IN nieuwBaanId INT
)
BEGIN
    -- Check if the new baan has hekjes
    IF (SELECT heeft_hek FROM baan WHERE id = nieuwBaanId) = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Deze baan is ongeschikt voor kinderen omdat deze geen hekjes heeft';
    ELSE
        -- Update the baan_id for the given reservering
        UPDATE reserveringen
        SET baan_id = nieuwBaanId
        WHERE id = reserveringId;

        -- Return success message
        SELECT 'Het baannummer is gewijzigd' AS success_message;
    END IF;
END;
