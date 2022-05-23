package jakopec.model;

import jakarta.persistence.*;

@Entity
@DiscriminatorValue("dvaUnosa")
public class MjesanjeDvaUnosa extends Mjesanje {

    @Column(name = "bodovaprviunos")
    private int bodovaPrviUnos;
    @Column(name = "bodovadrugiunos")
    private int bodovaDrugiUnos;

    @Column(name = "zvanjeprviunos")
    private int zvanjePrviUnos;
    @Column(name = "zvanjedrugiunos")
    private int zvanjeDrugiUnos;


    public int getBodovaPrviUnos() {
        return bodovaPrviUnos;
    }

    public void setBodovaPrviUnos(int bodovaPrviUnos) {
        this.bodovaPrviUnos = bodovaPrviUnos;
    }

    public int getBodovaDrugiUnos() {
        return bodovaDrugiUnos;
    }

    public void setBodovaDrugiUnos(int bodovaDrugiUnos) {
        this.bodovaDrugiUnos = bodovaDrugiUnos;
    }

    public int getZvanjePrviUnos() {
        return zvanjePrviUnos;
    }

    public void setZvanjePrviUnos(int zvanjePrviUnos) {
        this.zvanjePrviUnos = zvanjePrviUnos;
    }

    public int getZvanjeDrugiUnos() {
        return zvanjeDrugiUnos;
    }

    public void setZvanjeDrugiUnos(int zvanjeDrugiUnos) {
        this.zvanjeDrugiUnos = zvanjeDrugiUnos;
    }


    @Override
    public Rezulat getRezultat() {
        return new Rezulat(getBodovaPrviUnos() + getZvanjePrviUnos(),
                getBodovaDrugiUnos() + getZvanjeDrugiUnos());
    }
}
