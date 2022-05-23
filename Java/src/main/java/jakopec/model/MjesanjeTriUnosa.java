package jakopec.model;

import jakarta.persistence.Column;
import jakarta.persistence.DiscriminatorValue;
import jakarta.persistence.Entity;
import jakarta.persistence.Table;

@Entity
@DiscriminatorValue("triUnosa")
public class MjesanjeTriUnosa extends MjesanjeDvaUnosa {


    @Column(name = "bodovatreciunos")
    private int bodovaTreciUnos;

    @Column(name = "zvanjetreciunos")
    private int zvanjeTreciUnos;

    public int getBodovaTreciUnos() {
        return bodovaTreciUnos;
    }

    public void setBodovaTreciUnos(int bodovaTreciUnos) {
        this.bodovaTreciUnos = bodovaTreciUnos;
    }

    public int getZvanjeTreciUnos() {
        return zvanjeTreciUnos;
    }

    public void setZvanjeTreciUnos(int zvanjeTreciUnos) {
        this.zvanjeTreciUnos = zvanjeTreciUnos;
    }

    @Override
    public Rezulat getRezultat() {
        Rezulat r = super.getRezultat();
        r.setTreci(getBodovaTreciUnos() + getZvanjeTreciUnos());
        return  r;
        //return new Rezulat(getBodovaPrviUnos() + getZvanjePrviUnos(),
        //        getBodovaDrugiUnos() + getZvanjeDrugiUnos(),
        //        getBodovaTreciUnos() + getZvanjeTreciUnos());
    }
}
