package com.example.javaInventory.configuration;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.ResourceHandlerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

import java.nio.file.Path;
import java.nio.file.Paths;

@Configuration
public class mvcConfiguration implements WebMvcConfigurer {

    @Override
    public void addResourceHandlers(ResourceHandlerRegistry registration) {
        Path uploadDir = Paths.get("./product-images/");
        String uploadPath = uploadDir.toFile().getAbsolutePath();

        registration.addResourceHandler("/product-images/**").addResourceLocations("file:/" + uploadPath + "/");
    }
}

