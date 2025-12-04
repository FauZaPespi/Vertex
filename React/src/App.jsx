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
      
    </div>
  )
}

export default App