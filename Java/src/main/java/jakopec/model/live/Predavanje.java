package jakopec.model.live;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToMany;
import jakarta.persistence.ManyToOne;

import java.util.List;

@Entity
public class Predavanje extends NadKlasa {

    @ManyToOne
    private Mjesto mjesto;


    @ManyToMany
    private List<Mjesto> odakleSuDosliLJudi;


    public List<Mjesto> getOdakleSuDosliLJudi() {
        return odakleSuDosliLJudi;
    }

    public void setOdakleSuDosliLJudi(List<Mjesto> odakleSuDosliLJudi) {
        this.odakleSuDosliLJudi = odakleSuDosliLJudi;
    }

    public Mjesto getMjesto() {
        return mjesto;
    }

    public void setMjesto(Mjesto mjesto) {
        this.mjesto = mjesto;
    }

    private String svojtvo1;
    private String svojtvo2;
    private String svojtvo3;
    private String svojtvo4;
    private String svojtvo5;
    private String svojtvo6;
    private String svojtvo7;
    private String svojtvo8;
    private String svojtvo9;
    private String svojtvo10;

    public String getSvojtvo1() {
        return svojtvo1;
    }

    public void setSvojtvo1(String svojtvo1) {
        this.svojtvo1 = svojtvo1;
    }

    public String getSvojtvo2() {
        return svojtvo2;
    }

    public void setSvojtvo2(String svojtvo2) {
        this.svojtvo2 = svojtvo2;
    }

    public String getSvojtvo3() {
        return svojtvo3;
    }

    public void setSvojtvo3(String svojtvo3) {
        this.svojtvo3 = svojtvo3;
    }

    public String getSvojtvo4() {
        return svojtvo4;
    }

    public void setSvojtvo4(String svojtvo4) {
        this.svojtvo4 = svojtvo4;
    }

    public String getSvojtvo5() {
        return svojtvo5;
    }

    public void setSvojtvo5(String svojtvo5) {
        this.svojtvo5 = svojtvo5;
    }

    public String getSvojtvo6() {
        return svojtvo6;
    }

    public void setSvojtvo6(String svojtvo6) {
        this.svojtvo6 = svojtvo6;
    }

    public String getSvojtvo7() {
        return svojtvo7;
    }

    public void setSvojtvo7(String svojtvo7) {
        this.svojtvo7 = svojtvo7;
    }

    public String getSvojtvo8() {
        return svojtvo8;
    }

    public void setSvojtvo8(String svojtvo8) {
        this.svojtvo8 = svojtvo8;
    }

    public String getSvojtvo9() {
        return svojtvo9;
    }

    public void setSvojtvo9(String svojtvo9) {
        this.svojtvo9 = svojtvo9;
    }

    public String getSvojtvo10() {
        return svojtvo10;
    }

    public void setSvojtvo10(String svojtvo10) {
        this.svojtvo10 = svojtvo10;
    }
}
