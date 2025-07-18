import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';
import Navbar from "../componets/Navbar";
import Footer from "../componets/Footer";
import { motion } from "framer-motion";

const languageIcons = {
  'HTML': 'fab fa-html5 text-orange-500',
  'CSS': 'fab fa-css3-alt text-blue-500',
  'JavaScript': 'fab fa-js-square text-yellow-400',
  'React': 'fab fa-react text-blue-400',
  'Python': 'fab fa-python text-blue-400',
  'Java': 'fab fa-java text-red-500',
  'PHP': 'fab fa-php text-purple-500',
  'SQL': 'fas fa-database text-blue-500',
  'C++': 'devicon-cplusplus-plain text-[#0a63b0]',
  'C#': 'devicon-csharp-plain text-purple-600',
  'C Programming': 'fas fa-code text-green-600',
  'TypeScript': 'devicon-typescript-plain text-blue-600',
  'Data Structures & Algorithms': 'fas fa-code-branch text-purple-500',
  'Data Structures': 'fas fa-code-branch text-purple-500',
  'Algorithms': 'fas fa-sort-amount-up text-indigo-500',
  'DBMS': 'fas fa-database text-blue-400',
  'Operating System': 'fas fa-desktop text-green-500',
  'Operating Systems': 'fas fa-desktop text-green-500',
  'Computer Networks': 'fas fa-network-wired text-blue-500',
  'OOPs Concepts': 'fas fa-cubes text-red-500',
  'OOP': 'fas fa-cubes text-red-500',
  'Software Engineering': 'fas fa-project-diagram text-indigo-600',
  'Web & Internet Technologies': 'fas fa-globe text-blue-600',
  'Computer Organization & Architecture': 'fas fa-microchip text-yellow-600',
  'Theory of Computation': 'fas fa-brain text-purple-600',
  'Compiler Design': 'fas fa-cogs text-gray-600',
  'SSC CGL': 'fas fa-file-alt text-blue-500',
  'SSC CHSL': 'fas fa-file-alt text-blue-500',
  'SSC GD': 'fas fa-file-alt text-blue-500',
  'SSC MTS': 'fas fa-file-alt text-blue-500',
  'SSC Stenographer': 'fas fa-file-alt text-blue-500'
};

const containerVariants = {
  hidden: { opacity: 0 },
  visible: {
    opacity: 1,
    transition: {
      staggerChildren: 0.2
    }
  }
};

const itemVariants = {
  hidden: { y: 20, opacity: 0 },
  visible: {
    y: 0,
    opacity: 1,
    transition: {
      duration: 0.5
    }
  }
};

// API service function
const fetchCategories = async () => {
  try {
    const response = await fetch(
      "http://localhost:8080/PrepPoint/public/api/category_full.php",
      {
        method: "GET",
        headers: {
          "X-API-KEY": "prep_2025_$trong_k3y",
          "Content-Type": "application/json"
        }
      }
    );

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    return await response.json();
  } catch (error) {
    console.error("Failed to fetch categories:", error);
    throw error;
  }
};

function Category() {
  const location = useLocation();
  const [categories, setCategories] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const loadCategories = async () => {
      try {
        const data = await fetchCategories();
        setCategories(data);
      } catch (err) {
        setError(err.message || 'Failed to load categories');
      } finally {
        setLoading(false);
      }
    };

    loadCategories();
  }, []);

  useEffect(() => {
    if (location.hash && categories) {
      const element = document.getElementById(location.hash.substring(1));
      if (element) {
        setTimeout(() => {
          element.scrollIntoView({ behavior: 'smooth' });
          element.classList.add('highlight-section');
          setTimeout(() => {
            element.classList.remove('highlight-section');
          }, 2000);
        }, 100);
      }
    }
  }, [location, categories]);

  if (loading) {
    return (
      <div className="min-h-screen flex flex-col bg-gray-50">
        <Navbar />
        <div className="flex-grow flex items-center justify-center">
          <div className="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
        </div>
        <Footer />
      </div>
    );
  }

  if (error) {
    return (
      <div className="min-h-screen flex flex-col bg-gray-50">
        <Navbar />
        <div className="flex-grow flex items-center justify-center">
          <div className="text-center p-6 bg-red-50 rounded-lg max-w-md">
            <h3 className="text-xl font-medium text-red-800 mb-2">Error loading categories</h3>
            <p className="text-red-700">{error}</p>
            <button 
              onClick={() => window.location.reload()}
              className="mt-4 px-4 py-2 bg-red-100 text-red-700 rounded hover:bg-red-200 transition-colors"
            >
              Try Again
            </button>
          </div>
        </div>
        <Footer />
      </div>
    );
  }

  if (!categories) return null;

  return (
    <div className="min-h-screen flex flex-col bg-gray-50">
      <Navbar />
      <main className="flex-grow">
        {/* Hero Section */}
        <section className="bg-gradient-to-t from-blue-100 via-blue-400 to-blue-500 text-white py-16">
          <div className="container mx-auto px-3 text-center">
            <motion.h1 
              initial={{ y: -20, opacity: 0 }}
              animate={{ y: 0, opacity: 1 }}
              transition={{ duration: 0.6 }}
              className="text-4xl md:text-5xl font-bold mb-4"
            >
              Explore Learning Categories
            </motion.h1>
            <motion.p 
              initial={{ y: 20, opacity: 0 }}
              animate={{ y: 0, opacity: 1 }}
              transition={{ duration: 0.6, delay: 0.2 }}
              className="text-xl md:text-2xl max-w-3xl mx-auto text-gray-200"
            >
              Discover our comprehensive collection of courses and resources
            </motion.p>
            <div id="it"></div>
          </div>
        </section>

        {/* Categories Section */}
        <div className="container mx-auto px-4 py-12">
          {/* Information Technology Section */}
          {categories.it && (
            <motion.section 
              initial="hidden"
              whileInView="visible"
              viewport={{ once: true }}
              variants={containerVariants}
              className={`mb-16 p-8 rounded-2xl shadow-lg ${categories.it.bgColor}`}
            >
              <div className="flex items-center mb-8">
                <div className="text-5xl mr-4">{categories.it.mainIcon}</div>
                <div>
                  <motion.h2 variants={itemVariants} className="text-3xl font-bold text-gray-800">
                    {categories.it.title}
                  </motion.h2>
                  <motion.p variants={itemVariants} className="text-lg text-gray-600">
                    {categories.it.description}
                  </motion.p>
                </div>
              </div>

              <motion.div variants={containerVariants} className="grid md:grid-cols-2 gap-8">
                {categories.it.sections.map((section, index) => (
                  <motion.div 
                    key={`it-${index}`} 
                    variants={itemVariants}
                    className="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow"
                  >
                    <div className="flex items-center mb-4">
                      <div className={`text-3xl mr-3 bg-gradient-to-r ${section.color} text-transparent bg-clip-text`}>
                        {section.icon}
                      </div>
                      <h3 className="text-xl font-semibold">{section.title}</h3>
                    </div>
                    <div className="grid grid-cols-2 md:grid-cols-3 gap-3">
                      {section.items.map((item, i) => (
                        <motion.div 
                          key={`it-item-${i}`}
                          whileHover={{ scale: 1.05 }}
                          className="bg-white border cursor-pointer border-gray-200 rounded-lg p-3 hover:shadow-md transition-all flex flex-col items-center"
                        >
                          {languageIcons[item] ? (
                            <i className={`${languageIcons[item]} text-2xl mb-2`}></i>
                          ) : (
                            <i className="fas fa-book text-gray-400 text-2xl mb-2"></i>
                          )}
                          <div className="text-sm font-medium text-center text-[#0a63b0]">
                            {item}
                          </div>
                        </motion.div>
                      ))}
                    </div>
                  </motion.div>
                ))}
              </motion.div>
              <div id="government"></div>
            </motion.section>
          )}
          
          {/* Government Exams Section */}
          {categories.government && (
            <motion.section 
              initial="hidden"  
              whileInView="visible"
              viewport={{ once: true }}
              variants={containerVariants}
              className={`mb-16 p-8 rounded-2xl shadow-lg ${categories.government.bgColor}`}
            >
              <div className="flex items-center mb-8">
                <div className="text-5xl mr-4">{categories.government.mainIcon}</div>
                <div>
                  <motion.h2 variants={itemVariants} className="text-3xl font-bold text-gray-800">
                    {categories.government.title}
                  </motion.h2>
                  <motion.p variants={itemVariants} className="text-lg text-gray-600">
                    {categories.government.description}
                  </motion.p>
                </div>
              </div>

              <motion.div variants={containerVariants} className="grid md:grid-cols-2 gap-8">
                {categories.government.sections.map((section, index) => (
                  <motion.div 
                    key={`gov-${index}`} 
                    variants={itemVariants}
                    className="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow"
                  >
                    <div className="flex items-center mb-4">
                      <div className={`text-3xl mr-3 bg-gradient-to-r ${section.color} text-transparent bg-clip-text`}>
                        {section.icon}
                      </div>
                      <h3 className="text-xl font-semibold">{section.title}</h3>
                    </div>
                    <div className="grid grid-cols-2 md:grid-cols-3 gap-3">
                      {section.items.length > 0 ? (
                        section.items.map((item, i) => (
                          <motion.div 
                            key={`gov-item-${i}`}
                            whileHover={{ scale: 1.05 }}
                            className="bg-white border cursor-pointer border-gray-200 rounded-lg p-3 hover:shadow-md transition-all flex flex-col items-center"
                          >
                            <i className='fas fa-file-alt text-blue-500 text-2xl mb-2'></i>
                            <div className="text-sm font-medium text-center text-[#0a63b0]">
                              {item}
                            </div>
                          </motion.div>
                        ))
                      ) : (
                        <div className="col-span-3 text-center py-4 text-gray-500">
                          Coming soon - check back later!
                        </div>
                      )}
                    </div>
                  </motion.div>
                ))}
              </motion.div>
            </motion.section>
          )}

          {/* Banking Exams Section */}
          {categories.bank && (
            <motion.section 
              id="bank"
              initial="hidden"
              whileInView="visible"
              viewport={{ once: true }}
              variants={containerVariants}
              className={`mb-16 p-8 rounded-2xl shadow-lg ${categories.bank.bgColor}`}
            >
              <div className="flex items-center mb-8">
                <div className="text-5xl mr-4">{categories.bank.mainIcon}</div>
                <div>
                  <motion.h2 variants={itemVariants} className="text-3xl font-bold text-gray-800">
                    {categories.bank.title}
                  </motion.h2>
                  <motion.p variants={itemVariants} className="text-lg text-gray-600">
                    {categories.bank.description}
                  </motion.p>
                </div>
              </div>

              <motion.div variants={containerVariants} className="grid md:grid-cols-1 gap-8">
                {categories.bank.sections.map((section, index) => (
                  <motion.div 
                    key={`bank-${index}`} 
                    variants={itemVariants}
                    className="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow"
                  >
                    <div className="flex items-center mb-4">
                      <div className={`text-3xl mr-3 bg-gradient-to-r ${section.color} text-transparent bg-clip-text`}>
                        {section.icon}
                      </div>
                      <h3 className="text-xl font-semibold">{section.title}</h3>
                    </div>
                    <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                      {section.items.length > 0 ? (
                        section.items.map((item, i) => (
                          <motion.div 
                            key={`bank-item-${i}`}
                            whileHover={{ scale: 1.05 }}
                            className="bg-white border border-gray-200 rounded-lg p-3 hover:shadow-md transition-all flex flex-col items-center"
                          >
                            <i className="fas fa-book text-gray-400 text-2xl mb-2"></i>
                            <div className="text-sm font-medium text-center text-[#0a63b0]">
                              {item}
                            </div>
                          </motion.div>
                        ))
                      ) : (
                        <div className="col-span-full text-center py-4 text-gray-500">
                          Coming soon - check back later!
                        </div>
                      )}
                    </div>
                  </motion.div>
                ))}
              </motion.div>
            </motion.section>
          )}
        </div>
      </main>
      <Footer />
    </div>
  );
}

export default Category;