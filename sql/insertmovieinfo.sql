use moviesdb;
-- set @imgPath := 'C:/xampp/htdocs/proj1/images/movie_poster';
set @imgPath := 'C:/Users/Acer/Documents/School Subjects/Y4S1/IM4717 Web App Design/Project/JY_Movies/images/movie_images';

insert into movieinfo values
    (1 , "Eddie Brock is still struggling to coexist with the
     shape-shifting extraterrestrial Venom. When deranged serial
      killer Cletus Kasady also becomes host to an alien symbiote, 
      Brock and Venom must put aside their differences to stop 
      his reign of terror.", 
      "Tom Hardy, Woody Harrelson, Amber Sienna, Michelle Williams","Andy Serkis" , 
      "14 October 2021", 
      "Tom Hardy, Kelly Marcel, Amy Pascal, Hutch Parker, Avi Arad, Matt Tolmach", 
      "Marvel Entertainment, Columbia Pictures", 
      "https://www.youtube.com/embed/giWIr7U1deA",
      load_file(CONCAT(@imgPath,'/VNM_1.jpg')),
      load_file(CONCAT(@imgPath,'/VNM_2.jpg')),
      load_file(CONCAT(@imgPath,'/VNM_3.jpeg'))
      );

    