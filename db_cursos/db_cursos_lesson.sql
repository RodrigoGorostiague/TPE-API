-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: db_cursos
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `slide_url` varchar(255) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `likes` int NOT NULL,
  `tema_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lessons_tema1_idx` (`tema_id`),
  CONSTRAINT `fk_lessons_tema1` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` VALUES (1,'Introduccion','https://www.youtube.com/embed/iGNoi8is3vk','https://docs.google.com/presentation/d/1_Zm9ZlUYcz9kNVSzgtaryKhXnuSWzvyO3RVe3QEK2ks/edit#slide=id.p','assets/images/angular.png',16,1),(2,'Componentes','https://www.youtube.com/embed/fO74AMjx2fk','https://docs.google.com/presentation/d/1_xREpDIHOWvecO9xsAz7WrA1FQJ04CFitg-0xacF3fw/edit#slide=id.p','assets/images/angular.png',0,1),(3,'Interfaces y Directivas','https://www.youtube.com/watch?v=aFXH_DvuVeQ','https://docs.google.com/presentation/d/1DlRPM_a9rex1cee7DjNaF5GO0hS-tU1sptKN_I2h57g/edit#slide=id.g92eb4243ca_0_0','assets/images/angular.png',0,1),(4,'Eventos & Binding','https://www.youtube.com/watch?v=vSLhBJbZtYQ','https://docs.google.com/presentation/d/1_Zm9ZlUYcz9kNVSzgtaryKhXnuSWzvyO3RVe3QEK2ks/edit#slide=id.p','assets/images/angular.png',0,1),(5,'Ruteo','https://www.youtube.com/watch?v=TNJEFvPuVjY','https://docs.google.com/presentation/d/10u4OlxhFj-4SqLKXfFeBJvKdf5KN2tr0pCtFK5euDVA/edit#slide=id.p','assets/images/angular.png',0,1),(6,'Comunicaion entre componentes','https://www.youtube.com/watch?v=nq1U_fVR1sw','https://docs.google.com/presentation/d/1g__35jk7ggIlUvdAl5rWAEo5Ktyznhx6u-bo3d-Lb98/edit#slide=id.p','assets/images/angular.png',0,1),(7,'Comunicaion entre componentes pt2.','https://www.youtube.com/watch?v=h7u-33BDgwA','https://docs.google.com/presentation/d/1qkRcDKGSy13aoRIlwgL9eYQmYMIjKOvO1mhCjSaT3OE/edit#slide=id.ga458e509f9_0_318','assets/images/angular.png',0,1),(8,'HTTP Client','https://www.youtube.com/watch?v=pmKK80MvGyE','https://docs.google.com/presentation/d/1Usq3x5qATNe0rtTg1E9h20TWDGLfuOwa79rUWgAw6Q0/edit#slide=id.ga3826fd68b_0_0','assets/images/angular.png',0,1),(9,'Introduccion pt.1','https://www.youtube.com/watch?v=eISD9Rlhm7I&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=2&t=1436s','https://docs.google.com/presentation/d/1j6eo6Wp4UdaeNNarP5KPXmExBHepGU74/edit#slide=id.p1','assets/images/php.png',0,2),(10,'Arquitectura de sistemas','https://www.youtube.com/watch?v=I38djSzheIQ&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=3','https://docs.google.com/presentation/d/1g2ggub-46nS5cvZUi33rrxTPEQ18NKph/edit','assets/images/php.png',0,2),(11,'Ruteo y Pretty URL´s ','https://www.youtube.com/watch?v=dQrvw0eBnMs&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=4','https://docs.google.com/presentation/d/1DLig9wwVg27NdF0ES7ZhJaS5fdpbcfJD/edit','assets/images/php.png',0,2),(12,'Base de Datos y PHP','https://www.youtube.com/watch?v=ZDog82b0eAs&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=6','https://docs.google.com/presentation/d/13ixKXWMV4yDn9d5FRUAA1QM_oFjCqQ8K/edit#slide=id.p1','assets/images/php.png',0,2),(13,'Persistencia y BBDD','https://www.youtube.com/watch?v=Ipwd78Albgg&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=7&t=1423s','https://docs.google.com/presentation/d/1zFy2uV4_LNGsCdLzX-58xjsmFz5BYHc1/edit','assets/images/php.png',0,2),(14,'Templates Engines (Smarty)','https://www.youtube.com/watch?v=6VB9fMowcBc&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=7&t=5772s','https://moodle.exa.unicen.edu.ar/mod/page/view.php?id=50482','assets/images/php.png',0,2),(15,'MVC en PHP','https://www.youtube.com/watch?v=NoBXL6pzlWY&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=9&t=1682s','https://moodle.exa.unicen.edu.ar/mod/url/view.php?id=47060','assets/images/php.png',0,2),(16,'MVC en PHP pt.2','https://www.youtube.com/watch?v=dqBS-0811Rk&list=PLRYpF0DLe1GOXQVeSshyTJE0EHhl2rxJ6&index=10','https://docs.google.com/presentation/d/1masABGhX7R-xjIrfMHOhXj06jr_Ht9ya/edit#slide=id.p1','assets/images/php.png',0,2);
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-17 19:57:13
