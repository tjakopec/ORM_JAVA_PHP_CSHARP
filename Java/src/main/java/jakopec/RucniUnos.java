package jakopec;

import jakopec.model.MjesanjeTriUnosa;

import java.sql.Connection;
import java.sql.PreparedStatement;

// OVO je samo code sampe, nije složeno za izvođenje
public class RucniUnos {

    private static Connection veza;

    public static void insert(MjesanjeTriUnosa mjesanje){
        try {

            PreparedStatement ps = veza.prepareStatement("insert into mjesanje " +
                    "(vrsta, belot, datumunosa, stiglja, bodovadrugiunos, bodovaprviunos, " +
                    "zvanjeprviunos, bodovatreciunos, zvanjetreciunos, partija) " +
                    "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            ps.setString(1,"triUnosa");
            ps.setBoolean(2,mjesanje.isBelot());
            ps.setDate(3, new java.sql.Date(mjesanje.getDatumUnosa().getTime()));
            ps.setBoolean(4,mjesanje.isStiglja());
            ps.setInt(5,mjesanje.getBodovaDrugiUnos());
            ps.setInt(6,mjesanje.getBodovaPrviUnos());
            ps.setInt(7,mjesanje.getZvanjePrviUnos());
            ps.setInt(8,mjesanje.getBodovaTreciUnos());
            ps.setInt(9,mjesanje.getZvanjeTreciUnos());
            ps.setLong(10,mjesanje.getPartija().getId());
            ps.executeUpdate();

        }catch(Exception e){

        }


    }

}

