using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace CSHARP.Migrations
{
    public partial class initial : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterDatabase()
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "igrac",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    ime = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    prezime = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    urlslika = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    spol = table.Column<int>(type: "int", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_igrac", x => x.id);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "lokacija",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    longitude = table.Column<double>(type: "double", nullable: false),
                    latitude = table.Column<double>(type: "double", nullable: false),
                    naziv = table.Column<string>(type: "longtext", nullable: true)
                        .Annotation("MySql:CharSet", "utf8mb4")
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_lokacija", x => x.id);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "partija",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    dokolikoseigra = table.Column<int>(type: "int", nullable: false),
                    lokacijaid = table.Column<int>(type: "int", nullable: false),
                    unosiid = table.Column<int>(type: "int", nullable: false),
                    vrsta = table.Column<string>(type: "longtext", nullable: false)
                        .Annotation("MySql:CharSet", "utf8mb4")
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_partija", x => x.id);
                    table.ForeignKey(
                        name: "FK_partija_igrac_unosiid",
                        column: x => x.unosiid,
                        principalTable: "igrac",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_partija_lokacija_lokacijaid",
                        column: x => x.lokacijaid,
                        principalTable: "lokacija",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "mjesanje",
                columns: table => new
                {
                    id = table.Column<int>(type: "int", nullable: false)
                        .Annotation("MySql:ValueGenerationStrategy", MySqlValueGenerationStrategy.IdentityColumn),
                    vrsta = table.Column<string>(type: "longtext", nullable: false)
                        .Annotation("MySql:CharSet", "utf8mb4"),
                    stiglja = table.Column<bool>(type: "tinyint(1)", nullable: false),
                    belot = table.Column<bool>(type: "tinyint(1)", nullable: false),
                    Partijaid = table.Column<int>(type: "int", nullable: true),
                    bodovaprviunos = table.Column<int>(type: "int", nullable: true),
                    bodovadrugiunos = table.Column<int>(type: "int", nullable: true),
                    zvanjeprviunos = table.Column<int>(type: "int", nullable: true),
                    zvanjedrugiunos = table.Column<int>(type: "int", nullable: true),
                    bodovatreciunos = table.Column<int>(type: "int", nullable: true),
                    zvanjetreciunos = table.Column<int>(type: "int", nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_mjesanje", x => x.id);
                    table.ForeignKey(
                        name: "FK_mjesanje_partija_Partijaid",
                        column: x => x.Partijaid,
                        principalTable: "partija",
                        principalColumn: "id");
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateTable(
                name: "partija_igrac",
                columns: table => new
                {
                    igraciid = table.Column<int>(type: "int", nullable: false),
                    partijeid = table.Column<int>(type: "int", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_partija_igrac", x => new { x.igraciid, x.partijeid });
                    table.ForeignKey(
                        name: "FK_partija_igrac_igrac_igraciid",
                        column: x => x.igraciid,
                        principalTable: "igrac",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_partija_igrac_partija_partijeid",
                        column: x => x.partijeid,
                        principalTable: "partija",
                        principalColumn: "id",
                        onDelete: ReferentialAction.Cascade);
                })
                .Annotation("MySql:CharSet", "utf8mb4");

            migrationBuilder.CreateIndex(
                name: "IX_mjesanje_Partijaid",
                table: "mjesanje",
                column: "Partijaid");

            migrationBuilder.CreateIndex(
                name: "IX_partija_lokacijaid",
                table: "partija",
                column: "lokacijaid");

            migrationBuilder.CreateIndex(
                name: "IX_partija_unosiid",
                table: "partija",
                column: "unosiid");

            migrationBuilder.CreateIndex(
                name: "IX_partija_igrac_partijeid",
                table: "partija_igrac",
                column: "partijeid");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "mjesanje");

            migrationBuilder.DropTable(
                name: "partija_igrac");

            migrationBuilder.DropTable(
                name: "partija");

            migrationBuilder.DropTable(
                name: "igrac");

            migrationBuilder.DropTable(
                name: "lokacija");
        }
    }
}
