import { useState } from 'react'
import {
  Brain,
  Calendar,
  FolderKanban,
  Sparkles,
  ArrowRight,
  CheckCircle2,
  Zap,
  Shield,
  Cloud
} from 'lucide-react'
import './App.css'
import RotatingText from './components/ui/RotatingText'
import TextPressure from './components/ui/TextPressure'
import GradualBlur from './components/ui/GradualBlur'
import TrueFocus from './components/ui/TrueFocus'
import ColorBends from './components/ui/ColorBends'
import GlassNavbar from './components/ui/GlassNavbar'
import GlassSurface from './components/ui/GlassSurface'

// Reactbits-style Blur Text Component
const BlurText = ({ children, delay = 0 }) => {
  return (
    <span
      className="blur-text"
      style={{ animationDelay: `${delay}ms` }}
    >
      {children}
    </span>
  )
}

// Feature Card Component with GlassSurface
const FeatureCard = ({ icon: Icon, title, description, index }) => {
  const [isHovered, setIsHovered] = useState(false)

  return (
    <div
      className="feature-card-wrapper"
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
      style={{ animationDelay: `${index * 100}ms` }}
    >
      <GlassSurface
        width="100%"
        height="100%"
        borderRadius={20}
        blur={15}
        brightness={isHovered ? 55 : 50}
        opacity={0.95}
        saturation={1.2}
        backgroundOpacity={0.1}
        className="feature-card-glass"
      >
        <div className={`feature-card ${isHovered ? 'hovered' : ''}`}>
          <div className="feature-icon-wrapper">
            <Icon className="feature-icon" strokeWidth={1.5} />
          </div>
          <h3 className="feature-title">{title}</h3>
          <p className="feature-description">{description}</p>
        </div>
      </GlassSurface>
    </div>
  )
}

// Stat Component
const StatItem = ({ value, label }) => (
  <div className="stat-item">
    <div className="stat-value">{value}</div>
    <div className="stat-label">{label}</div>
  </div>
)

function App() {
  const features = [
    {
      icon: FolderKanban,
      title: 'Enterprise Organization',
      description: 'Advanced project management with AI-powered categorization and intelligent file handling'
    },
    {
      icon: Calendar,
      title: 'Smart Scheduling',
      description: 'Automated calendar management with conflict resolution and intelligent meeting optimization'
    },
    {
      icon: Brain,
      title: 'AI-Powered Insights',
      description: 'Contextual conversations with deep understanding of your workflow and preferences'
    },
    {
      icon: Cloud,
      title: 'Secure Cloud Storage',
      description: 'Enterprise-grade media management with automatic backup and version control'
    },
    {
      icon: Zap,
      title: 'Lightning Fast',
      description: 'Optimized performance with real-time sync across all your devices'
    },
    {
      icon: Shield,
      title: 'Bank-Level Security',
      description: 'End-to-end encryption ensuring your data remains private and protected'
    }
  ]

  const benefits = [
    'Fastest Response Times',
    'No Support',
    'Completly free to use',
    'Easy Integration',
  ]

  // Navigation items for the navbar
  const navItems = [
    { label: 'Features', href: '#features' },
    { label: 'Pricing', href: '#pricing' },
    { label: 'About', href: '#about' },
    { label: 'Contact', href: '#contact' }
  ]

  return (
    <div className="app">
      {/* Background Effects */}
      <div className="background-effects">
        <ColorBends
          colors={["#aa1313ff", "#1e9e1eff", "#1e1e8dff"]}
          transparent={false}
        />
      </div>
      
      <GradualBlur
        target="page"
        position="bottom"
        height="6rem"
        strength={2}
        divCount={5}
        curve="bezier"
        exponential={true}
        opacity={1}
      />

      {/* Hero Section */}
      <section className="hero" id="home">
        <div className="hero-container">
          <GlassSurface
            width="auto"
            height="auto"
            borderRadius={32}
            blur={20}
            brightness={52}
            opacity={0.92}
            saturation={1.3}
            backgroundOpacity={0.08}
            className="hero-glass-wrapper"
          >
            <div className="hero-content">
              <h1 className="hero-title">
                <TextPressure
                  text="Vertex"
                  flex={true}
                  alpha={false}
                  stroke={false}
                  width={true}
                  weight={true}
                  italic={true}
                  textColor="#ffffff"
                  strokeColor="#ff0000"
                  minFontSize={36}
                />
                <BlurText delay={200}>Next gen</BlurText>
                <br />
                <BlurText delay={400}>AI Assistant</BlurText>
                <br />
                <br />
                <br />
                <TrueFocus
                  sentence="Only Essentials"
                  manualMode={true}
                  blurAmount={3}
                  borderColor="#815FF5"
                  animationDuration={0.5}
                />
              </h1>

              <p className="hero-subtitle">
                Vertex AI combines intelligent conversation with powerful organization tools,
                calendar management, and secure media handling. Everything your team needs
                to work smarter, not harder.
              </p>

              <div className="hero-cta">
                <button className="btn-primary">
                  Chat now
                  <ArrowRight size={20} />
                </button>
                <button className="btn-secondary">
                  Login
                </button>
              </div>

              <div className="hero-stats">
                <StatItem value="99.9%" label="Uptime" />
                <StatItem value="50K+" label="Active Users" />
                <StatItem value="2M+" label="Tasks Managed" />
                <StatItem value="4.9/5" label="User Rating" />
              </div>

              <div className="hero-benefits">
                {benefits.map((benefit, index) => (
                  <div key={index} className="benefit-item">
                    <CheckCircle2 size={16} className="check-icon" />
                    <span>{benefit}</span>
                  </div>
                ))}
              </div>
            </div>
          </GlassSurface>
        </div>
      </section>

      {/* Features Section */}
      <section className="features" id="features">
        <div className="features-container">
          <div className="section-header">
            <h2 className="section-title">
              Everything you need to
              <RotatingText
                texts={['stay organized', 'be a mastermind', 'plan some tasks', 'manage your life']}
                mainClassName="
                  inline-flex items-center
                  justify-center
                  px-2 py-0.5
                  bg-indigo-500 text-white 
                  rounded-lg 
                  whitespace-nowrap 
                  leading-tight 
                  align-middle
                  ml-3
                  w-[400px]
                "
                staggerFrom="last"
                initial={{ y: '100%' }}
                animate={{ y: 0 }}
                exit={{ y: '-120%' }}
                staggerDuration={0.025}
                splitLevelClassName="overflow-hidden"
                transition={{ type: 'spring', damping: 30, stiffness: 400 }}
                rotationInterval={4000}
              />
            </h2>

            <p className="section-subtitle">
              Built with the tools modern enterprises demand
            </p>
          </div>

          <div className="features-grid">
            {features.map((feature, index) => (
              <FeatureCard key={index} {...feature} index={index} />
            ))}
          </div>
        </div>
      </section>
    </div>
  )
}

export default App