<?php
            function getConnection() {
                try {
                    $connexion = new PDO("mysql:host=localhost;dbname=lafleur;charset=utf8", 'utilfleur', 'secret');
                }
                catch(PDOException $e)
                    {
                    die($e->getMessage());
                    }
                return $connexion ;
            }

            function getCategories() {
                $connexion = getConnection();
                $stm = $connexion->query("SELECT cat_code, cat_libelle FROM categorie");
                $categories=$stm->fetchAll();
                return $categories ;
                }

            function getProduits($cat) {
                $connexion = getConnection();
                $stm = $connexion->prepare("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image
                                            FROM produit where pdt_categorie = :cat");
                $stm->bindParam(':cat', $cat, PDO::PARAM_INT);
                $stm->execute();
                $produits=$stm->fetchAll();
                return $produits ;

            }

            function getTousProduits() {
                $connexion = getConnection();
                $stm = $connexion->query("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image FROM produit");
                $produits=$stm->fetchAll();
                return $produits ;

            }

            function getUtilisateur($nom, $prenom, $email, $adresse, $motDePasse){
                $connexion = getConnection();
                $sql = $connexion->prepare("INSERT INTO client (nom, prenom, email, adresse, motDePasse)
                VALUES (:nom , :prenom, :email, :adresse, :motDePasse)");
                $sql->bindParam(':nom', $nom, PDO::PARAM_STR);
                $sql->bindParam(':prenom', $prenom, PDO::PARAM_STR);
                $sql->bindParam(':email', $email, PDO::PARAM_STR);
                $sql->bindParam(':adresse', $adresse, PDO::PARAM_STR);
                $sql->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
                $resultat = $sql->execute();
                return $resultat;

            }

            function getConnect($email, $motDePasse){
                $connexion = getConnection();
                $sql = "SELECT * FROM client WHERE email =:email";
                $stm= $connexion->prepare($sql);
                $stm->bindParam(':email', $email, PDO::PARAM_STR);
                //$stm->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
                $stm->execute();
                $resultat =$stm->fetch();
                return $resultat;
                
                
            }
            // "SELECT * FROM client WHERE email =:email AND motDePasse = :motDePasse ";