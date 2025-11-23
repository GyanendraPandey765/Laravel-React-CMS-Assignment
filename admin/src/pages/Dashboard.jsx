import React, { useState, useEffect } from 'react';
import api from '../services/api';
import { FileText, Files, TrendingUp, Eye } from 'lucide-react';

const Dashboard = () => {
  const [stats, setStats] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetchStats();
  }, []);

  const fetchStats = async () => {
    try {
      const { data } = await api.get('/dashboard/stats');
      setStats(data);
    } catch (error) {
      console.error('Failed to fetch stats:', error);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return (
      <div className="flex items-center justify-center h-64">
        <div className="text-xl text-gray-600">Loading...</div>
      </div>
    );
  }

  const statCards = [
    {
      title: 'Total Posts',
      value: stats?.total_posts || 0,
      icon: FileText,
      bgColor: 'bg-blue-100',
      textColor: 'text-blue-600',
      iconBg: 'bg-blue-500'
    },
    {
      title: 'Published Posts',
      value: stats?.published_posts || 0,
      icon: TrendingUp,
      bgColor: 'bg-green-100',
      textColor: 'text-green-600',
      iconBg: 'bg-green-500'
    },
    {
      title: 'Total Pages',
      value: stats?.total_pages || 0,
      icon: Files,
      bgColor: 'bg-purple-100',
      textColor: 'text-purple-600',
      iconBg: 'bg-purple-500'
    },
    {
      title: 'Published Pages',
      value: stats?.published_pages || 0,
      icon: Eye,
      bgColor: 'bg-orange-100',
      textColor: 'text-orange-600',
      iconBg: 'bg-orange-500'
    }
  ];

  return (
    <div>
      <div className="mb-8">
        <h1 className="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p className="text-gray-600 mt-2">Welcome to your CMS admin panel</p>
      </div>
      
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {statCards.map((card, index) => {
          const Icon = card.icon;
          return (
            <div
              key={index}
              className={`${card.bgColor} rounded-lg p-6 hover:shadow-lg transition-shadow`}
            >
              <div className="flex items-center justify-between">
                <div>
                  <p className="text-sm font-medium text-gray-600 mb-1">{card.title}</p>
                  <p className="text-3xl font-bold text-gray-800">{card.value}</p>
                </div>
                <div className={`${card.iconBg} p-3 rounded-full`}>
                  <Icon className="w-6 h-6 text-white" />
                </div>
              </div>
            </div>
          );
        })}
      </div>

      {/* <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div className="bg-white rounded-lg shadow-md p-6">
          <h2 className="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
          <div className="space-y-3">
            <a href="/posts/create" className="block p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
              <p className="font-semibold text-blue-900">Create New Post</p>
              <p className="text-sm text-blue-700">Write and publish a new blog post</p>
            </a>
            <a href="/pages/create" className="block p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
              <p className="font-semibold text-purple-900">Create New Page</p>
              <p className="text-sm text-purple-700">Add a new static page to your site</p>
            </a>
          </div>
        </div>

        <div className="bg-white rounded-lg shadow-md p-6">
          <h2 className="text-xl font-bold text-gray-800 mb-4">Getting Started</h2>
          <ul className="space-y-3 text-gray-700">
            <li className="flex items-start">
              <span className="inline-flex items-center justify-center w-6 h-6 bg-green-100 text-green-600 rounded-full mr-3 flex-shrink-0">✓</span>
              <span>Navigate using the sidebar to manage content</span>
            </li>
            <li className="flex items-start">
              <span className="inline-flex items-center justify-center w-6 h-6 bg-green-100 text-green-600 rounded-full mr-3 flex-shrink-0">✓</span>
              <span>Create, edit, and delete posts and pages</span>
            </li>
            <li className="flex items-start">
              <span className="inline-flex items-center justify-center w-6 h-6 bg-green-100 text-green-600 rounded-full mr-3 flex-shrink-0">✓</span>
              <span>Toggle publish status to control visibility</span>
            </li>
          </ul>
        </div>
      </div> */}
    </div>
  );
};

export default Dashboard;